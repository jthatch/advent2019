.PHONY: all test test-dev

help: ## This help.
	@awk 'BEGIN {FS = ":.*?## "} /^[a-zA-Z_-]+:.*?## / {printf "\033[36m%-30s\033[0m %s\n", $$1, $$2}' $(MAKEFILE_LIST)

.DEFAULT_GOAL := help

# basic vars
current-dir   := $(dir $(abspath $(lastword $(MAKEFILE_LIST))))
image-name    :=$(shell basename $(PWD))
image-version :=$(shell git describe --abbrev=0 --tags --exact-match 2>/dev/null || git rev-parse --short HEAD)

build: ## Build docker image
	DOCKER_BUILDKIT=1 docker build \
		--file=Dockerfile \
		--tag="$(image-name):$(image-version)" .

run: ## Run the game
	docker run -it --rm \
		--name $(image-name) \
		"$(image-name):$(image-version)"

test: ## Run the testsuite
ifdef day
	docker run -it --rm \
		--name $(image-name) \
		-w /app \
		-e "SIMULATIONS=${SIMULATIONS}" \
		"$(image-name):$(image-version)" \
		./bin/phpunit -c phpunit.xml.dist test/Day${day}Test.php --testdox --coverage-text
else
	docker run -it --rm \
		--name $(image-name) \
		-w /app \
		-e "SIMULATIONS=${SIMULATIONS}" \
		"$(image-name):$(image-version)" \
		./bin/phpunit -c phpunit.xml.dist --testdox --coverage-text
endif

test-dev: ## Run tests in the local workspace
ifdef day
	docker run -it --rm \
		--name $(image-name) \
		-v "$(PWD)":/app \
		"$(image-name):$(image-version)" \
		php ./bin/phpunit -c phpunit.xml.dist test/Day${day}Test.php --testdox
else
	docker run -it --rm \
		--name $(image-name) \
		-v "$(PWD)":/app \
		"$(image-name):$(image-version)" \
		php ./bin/phpunit -c phpunit.xml.dist --testdox
endif

clean: ## Clean old docker images not attached
	docker rm $(docker ps -a -q);docker rmi $(docker images | grep "^<none>" | awk '{print $3}')