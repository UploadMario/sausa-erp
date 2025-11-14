# 🏥 SausaERP — Sistema ERP Modular para Entornos Asistenciales

**SausaERP** es una aplicación web desarrollada con **Laravel 10**, **PHP 8.2** y **MySQL**, orientada a la **gestión administrativa y asistencial** en instituciones de salud.  
Su arquitectura modular permite escalar funciones y optimizar procesos internos siguiendo lineamientos de **gestión de calidad (ISO 9001:2015)** y **calidad de software (ISO/IEC 25010:2011)**.

---

## 📘 Descripción General

El sistema está diseñado para digitalizar procesos recurrentes de atención, registro y control, manteniendo **trazabilidad**, **eficiencia operativa** y **cumplimiento normativo**.  
SausaERP se estructura bajo el patrón **MVC (Model–View–Controller)** de Laravel, promoviendo mantenibilidad y separación lógica de capas.

### 🎯 Objetivos principales
- Facilitar el registro y consulta de datos administrativos y clínicos.
- Optimizar los tiempos de atención mediante un flujo de trabajo digital unificado.
- Asegurar la integridad, disponibilidad y confidencialidad de la información.
- Cumplir con principios de calidad de software definidos por ISO/IEC 25010.

---

## 🧩 Arquitectura del Sistema

| Componente | Descripción |
|-------------|-------------|
| **Backend** | Laravel 10 (Framework PHP) |
| **Frontend** | Blade + Bootstrap 5 |
| **Base de datos** | MySQL 8 |
| **Servidor local** | XAMPP / PHP 8.2 |
| **ORM** | Eloquent |
| **Control de versiones** | Git + GitHub |
| **Estructura** | Patrón MVC, modular y escalable |

---

## ⚙️ Instalación y Configuración

### 1️⃣ Clonar el repositorio
```bash
git clone https://github.com/UploadMario/sausa-erp.git
cd sausa-erp
```

### 2️⃣ Instalar dependencias
```bash
composer install
npm install && npm run dev
```

### 3️⃣ Configurar entorno
Copia el archivo de entorno base y genera la clave de aplicación:
```bash
cp .env.example .env
php artisan key:generate
```

Actualiza las variables de conexión en el archivo `.env`:
```env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=sausa_erp
DB_USERNAME=root
DB_PASSWORD=
```

### 4️⃣ Migrar la base de datos
```bash
php artisan migrate --seed
```

### 5️⃣ Iniciar el servidor local
```bash
php artisan serve
```
El sistema estará disponible en:  
👉 `http://localhost:8000`

---

## 🧠 Cumplimiento Normativo

El desarrollo de SausaERP se fundamenta en principios de calidad y mejora continua alineados con:

| Norma | Aplicación |
|--------|-------------|
| **ISO 9001:2015** | Gestión de la calidad y mejora de procesos. |
| **ISO/IEC 25010:2011** | Modelo de calidad de software (funcionalidad, mantenibilidad, usabilidad, rendimiento). |
| **ISO 9126** | Definición de métricas y evaluación de atributos de calidad. |

Estos marcos normativos orientan las decisiones de diseño, codificación y documentación.

---

## 🧩 Funcionalidades Principales

| Módulo | Descripción |
|---------|-------------|
| **Pacientes** | Registro, búsqueda y edición de información básica. |
| **Consultas** | Gestión de visitas y servicios asistenciales. |
| **Farmacia** | Control de inventario, despacho y stock de medicamentos. |
| **Reportes** | Generación de reportes de actividad y flujo de atención. |
| **Usuarios** | Control de acceso y roles mediante autenticación segura. |

Cada módulo se implementa siguiendo principios de **acoplamiento bajo y cohesión alta**, garantizando independencia funcional y mantenibilidad.

---

## 🔒 Seguridad y Buenas Prácticas

- Protección de credenciales mediante el archivo `.env` (no incluido en el repositorio).
- Validación de formularios con reglas del servidor (Laravel Validation).
- Uso de **migraciones** y **seeders** para evitar dependencias de datos externos.
- Separación de capas (modelo, vista y controlador).
- Cumplimiento de buenas prácticas **PSR-12** y **OWASP** básicas.

---

## 🧾 Mantenimiento y Escalabilidad

- **Actualizaciones**: Dependencias gestionadas con Composer y NPM.  
- **Logs**: Almacenamiento en `/storage/logs`.  
- **Migraciones**: Control de versiones de base de datos mediante Artisan.  
- **Entornos múltiples**: Configuración adaptable (local, staging, producción).  

---

## 🧑‍💻 Equipo de Desarrollo

Proyecto académico desarrollado en el marco de la carrera de **Ingeniería de Sistemas e Informática**.  

---

## 📄 Licencia

Uso educativo y demostrativo.  
Este proyecto se distribuye bajo licencia **MIT**.  
Basado en el framework [Laravel](https://laravel.com).

---

## 🧭 Estado del Proyecto

📍 *Versión Parcial – Desarrollo hasta la Evaluación Intermedia (Octubre 2025)*  
📍 Módulos implementados: Pacientes, Farmacia, Reportes Básicos.  
📍 En desarrollo: autenticación avanzada y control de usuarios.

---

✨ *SausaERP — porque la calidad del software también es parte de la atención.*
