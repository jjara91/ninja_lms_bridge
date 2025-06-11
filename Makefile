# Configuración de nombres de contenedores
DOMAIN_CONTAINER=domain

# Ejecutar Composer require en el dominio
domain-require:
	docker exec -it $(DOMAIN_CONTAINER) composer require $(filter-out $@,$(MAKECMDGOALS))

# Ejecutar Composer require en el dominio
domain-remove:
	docker exec -it $(DOMAIN_CONTAINER) composer remove $(filter-out $@,$(MAKECMDGOALS))

# Ejecutar Composer install en el dominio
domain-install:
	docker exec -it $(DOMAIN_CONTAINER) composer install

# Ejecutar Composer update en el dominio
domain-update:
	docker exec -it $(DOMAIN_CONTAINER) composer update

# Ejecutar Pest en el dominio
domain-test:
	docker exec -it $(DOMAIN_CONTAINER) ./vendor/bin/pest

# Alias útil para levantar los servicios
up:
	docker-compose up -d --build --no-cache

# Detener contenedores
down:
	docker-compose down
