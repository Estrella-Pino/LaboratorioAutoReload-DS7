# Laboratorio: Implementación de Autocarga PSR-4 con Composer

Este repositorio contiene la documentación y una estructura práctica para implementar el estándar **PSR-4** mediante el sistema de autocarga (_Autoload_) de **Composer** en PHP, evitando el uso manual de `require` e `include` para cargar clases.

---

## Información del Estudiante

- **Nombre:** Estrella Pino
- **Cédula:** 8-1031-1486
- **Curso:** Desarrollo de Software 7
- **Fecha de Ejecución:** 01-05-2026
- **Instructor de Laboratorio:** Irina Fong

---

## Introducción

El estándar **PSR-4** define una forma estandarizada de cargar clases automáticamente en PHP a partir del **namespace** y un **mapeo con carpetas**.

El objetivo del laboratorio es sustituir la importación manual por una solución automatizada, limpia y escalable bajo el principio de **Lazy Loading** (carga bajo demanda): Composer solo carga las clases cuando realmente se usan.

---

## Estructura del Proyecto

La correspondencia entre jerarquía de carpetas y namespaces es estricta (case-sensitive). En este proyecto, según `composer.json`, el mapeo PSR-4 es:

- **`App\` → `app/`**

![alt text](image-1.png)

---

## Flujo de Trabajo — Paso a Paso

### Paso 1 — Configurar la regla PSR-4 en `composer.json`

En la raíz del proyecto se define el mapeo PSR-4. En este repo el archivo `composer.json` contiene:

- `App\` busca clases dentro de `app/`

Ejemplo (conceptual):

- `App\Models\Producto` debe existir en `app/Models/Producto.php`
- `App\Services\Saludo` debe existir en `app/Services/Saludo.php`

---

### Paso 2 — Crear clases con namespace correcto

Cada archivo de clase declara su espacio de nombres inmediatamente después de `<?php`.

Ejemplo: `app/Models/Producto.php`

![alt text](image-2.png)

---

### Paso 3 — Ejecutar `composer install`

Para que Composer procese la configuración y genere el cargador, se ejecuta:

Bash

```bash
composer install
```

Esto crea la carpeta `vendor/` y el archivo autogenerado `vendor/autoload.php`.

---

### Paso 4 — Usar el cargador y declarar clases con `use`

En el script de prueba (por ejemplo `index.php`) se carga una vez el autoload:

PHP

```php
require("vendor/autoload.php");
```

Luego se utilizan las clases declarando sus namespaces con `use`:

![alt text](image-4.png)

Aclaración técnica: `use` no carga el archivo desde disco. Solo crea un alias del namespace dentro del script. La carga real ocurre cuando se instancia la clase, y Composer resuelve su ubicación usando la regla PSR-4.

---

### Paso 5 — Código de prueba (`index.php`)

El proyecto ya incluye un ejemplo en `index.php`:

- `App\Models\Producto` → `app/Models/Producto.php`
- `App\Services\Saludo` → `app/Services/Saludo.php`

Ejemplo (resumen):

- Se instancia `Producto` y se imprime el resultado de `mostrarProducto()`.
- Se instancia `Saludo` y se imprime el resultado de `mensaje()`.

---

### Paso 6 — Configurar `.gitignore` para `vendor/`

Antes de publicar el proyecto, es importante ignorar dependencias generadas por Composer:

Plaintext

```txt
/vendor/
```

Finalidad: al clonar un repositorio limpio (sin `vendor/`), basta ejecutar `composer install` para reconstruir el entorno de forma inmediata.

---

## Conclusiones Técnicas

### Mantenibilidad y Escalabilidad

- El desarrollo se vuelve modular.
- Agregar nuevas clases no exige modificar el cargador de forma manual: basta con respetar el mapeo PSR-4 (namespace ↔ carpeta).

### Optimización de Memoria (Lazy Loading)

- Composer solo resuelve y carga las clases que realmente se instancian durante la ejecución.
- En proyectos con muchas clases, esto reduce consumo de memoria y mejora el rendimiento.
