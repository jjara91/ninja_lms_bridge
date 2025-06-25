# Arquitectura Ninja LMS Bridge

Este repositorio contiene un ejemplo de arquitectura propuesta para el desarrollo de la integración de Ninja con el LMS de BUK

## Instalación
Ejecutar los siguientes comandos:

```bash
# Clonar repositorio
git clone git@github.com:jjara91/ninja_lms_bridge.git

# Mover a carpeta raíz del repositorio
cd ninja_lms_bridge

# Inicializar contenedores
make up

# Inicializar API
# Ejecuta migraciones y fixtures con datos de prueba
make api-init

# Aparecerá el siguiente mensaje:
# Careful, database "lmsbridge" will be purged. Do you want to continue? (yes/no)
# Ingresar "yes"
```

## Ingresar API doc
Ingresar a la siguiente url http://localhost/api para entrar al swagger de la API y probar los endpoints de ejemplo.

## Configuración Doctrine
Para mantener las entidades del dominio limpias de detalles de implementación de la infraestructura, se mapearon por medio
de configuración XML, los archivos de configuración de cada entidad se encuentran en las rutas "/core/src/*/Infrastructure/persistence/doctrine/*.orm.xml"
y estos archivos se utilizan desde la configuración de doctrine "apps/api/config/packages/doctrine.yaml" bajo la llave "mappings".

## Configuración API Platform
Existen dos opciones para generar los recursos de la API sin acoplar muestro dominio a detalles de implementación:

### 1. Endpoints /api/courses y /api/courses/{id}
Estos endpoints no utilizan directamente la entidad "LMSBridge\Catalog\Domain\Course" como recurso, si no más bien se creó
una clase "App\ApiResource\CourseAPI" la cual contiene la configuración vía atributos y se mapea manualmente a la entidad.

### 2. Endpoints /api/students y /api/students/{id}
Estos endpoints si utilizan directamente la entidad "LMSBridge\Student\Domain\Student" como recurso, pero se mapea por
configuración en el archivo /apps/api/config/api_platform/resources.yaml