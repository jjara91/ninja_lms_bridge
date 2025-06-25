# Configuración de nombres de contenedores
API_CONTAINER=lms_api

# Ejecutar Pest en el dominio
api-init:
	docker exec -it $(API_CONTAINER) bin/console d:m:m --no-interaction --all-or-nothing \
	&& docker exec -it $(API_CONTAINER) bin/console d:f:l

# Alias útil para levantar los servicios
up:
	docker-compose up -d --build

# Detener contenedores
down:
	docker-compose down