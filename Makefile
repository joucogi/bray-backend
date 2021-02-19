current-dir := $(dir $(abspath $(lastword $(MAKEFILE_LIST))))

build: deps

deps: composer-install

composer-env-file:
	@if [ ! -f .env.local ]; then echo '' > .env.local; fi

composer-install: composer-env-file
	@docker run --rm $(INTERACTIVE) --volume $(current-dir):/app --user $(id -u):$(id -g) \
		composer:2 install \
			--ignore-platform-reqs \
			--no-ansi
