current-dir := $(dir $(abspath $(lastword $(MAKEFILE_LIST))))

.PHONY: build
build: deps start

.PHONY: start
start: CMD=up --build -d

.PHONY: stop
stop: CMD=down

start stop:
	@docker-compose $(CMD)

# Dependencies
deps: composer-install

composer-env-file:
	@if [ ! -f .env.local ]; then echo '' > .env.local; fi

.PHONY: composer-install
composer-install: CMD=install

.PHONY: composer-update
composer-update: CMD=update

.PHONY: composer-require
composer-require: CMD=require $(module)

.PHONY: composer-require-dev
composer-require-dev: CMD=require --dev  $(module)

composer-install composer-update composer-require composer-require-dev: composer-env-file
	@docker run --rm $(INTERACTIVE) --volume $(current-dir):/app --user $(id -u):$(id -g) \
		composer:2 $(CMD) \
			--ignore-platform-reqs \
			--no-ansi

# Cache
.PHONY: cache-clear
cache-clear:
	@docker exec -it bray-socialnetwork-backend-php apps/socialnetwork/backend/bin/console cache:clear

# Test
.PHONY: test
test: composer-env-file
	docker exec bray-socialnetwork-backend-php ./vendor/bin/phpunit --testsuite socialnetwork