# 📘 Empresa CBYBordado

Bienvenido a **ERPBordados**, una aplicación web desarrollada en **Laravel** para la gestión de de una empresa de Bordado.  
Con esta herramienta puedes llevar el control de **materiales, Ingreso de Ordenes, Control de Produccion y Reportes de ventas,producccion y inventarios \*** de una manera moderna y organizada.

---

## 🚀 Tecnologías utilizadas

-   [Laravel 10](https://laravel.com/) - Framework PHP
-   [Bootstrap 5](https://getbootstrap.com/) - Estilos y componentes
-   [FontAwesome](https://fontawesome.com/) - Iconos
-   [AOS](https://michalsnik.github.io/aos/) - Animaciones en scroll
-   [MySQL](https://www.mysql.com/) - Base de datos

---

## ⚙️ Instalación y Configuración

Sigue estos pasos para correr el proyecto en tu máquina local:

```bash
# 1. Clonar el repositorio
git clone https://github.com/HorasSocialesEsit/CYABordados.git

# 2. Entrar al directorio
cd CYABordados

# 3. Instalar dependencias
composer install

# 4. Copiar archivo de entorno
cp .env.example .env

# 5. Generar la key de la aplicación
php artisan key:generate

# 6. Configurar la base de datos en el archivo .env

# 7. Ejecutar migraciones
php artisan migrate

# 8. (Opcional) Cargar datos iniciales
php artisan db:seed

# 9 es crear storage para guardar las fotos de los usuarios
php artisan storage:link


# 9. Levantar el servidor prueba
php artisan serve
```
