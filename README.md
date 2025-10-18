# 💇‍♂️ App Peluquería

![Laravel](https://img.shields.io/badge/Laravel-11.x-FF2D20?logo=laravel)
![MySQL](https://img.shields.io/badge/MySQL-8.x-00758F?logo=mysql)
![Blade](https://img.shields.io/badge/Blade-Template-orange)
![License](https://img.shields.io/badge/license-MIT-green)

Aplicación web desarrollada con **Laravel + MySQL + Blade** para la gestión de servicios y citas en una peluquería.  
Permite administrar servicios, agendar citas, gestionar usuarios y mantener un flujo de trabajo eficiente entre clientes y administrador.

---

## 🚀 Funcionalidades principales

✅ Registro e inicio de sesión de usuarios.  
✅ Panel de administración con gestión de servicios (CRUD).  
✅ Agendamiento de citas con selección múltiple de servicios.  
✅ Validaciones en servidor (Form Requests) y protección CSRF.  
✅ Interfaz limpia y responsive con Blade y Tailwind CSS.  
✅ Migraciones y Seeders automáticos para generar datos de prueba.  

---

## 🧰 Tecnologías utilizadas

| Tipo | Herramienta |
|------|--------------|
| **Framework** | Laravel 11 |
| **Lenguaje** | PHP 8+ |
| **Base de Datos** | MySQL 8.x |
| **Frontend** | Blade, HTML5, CSS3 |
| **Servidor Local** | XAMPP |
| **Control de versiones** | Git + GitHub |

---

## ⚙️ Instalación y configuración local

Sigue estos pasos para ejecutar el proyecto en tu entorno local.

### 1️⃣ Clonar el repositorio

```bash
git clone https://github.com/juanchos3233/app_peluqueria.git
cd app_peluqueria

👨‍💼 Roles del sistema
Rol	Descripción
Administrador    	Gestiona servicios y citas del día.
Cliente	            Agenda citas y selecciona servicios disponibles.
