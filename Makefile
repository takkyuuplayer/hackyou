PHP=$(shell which php)
CURL=$(shell which curl)
ifneq ("$(wildcard composer.phar)", "")
COMPOSER=./composer.phar
else
COMPOSER=composer
endif

all: composer-update composer-setup

composer-update:
	$(COMPOSER) self-update

composer-setup:
	$(COMPOSER) install

test:
	./vendor/bin/phpunit --bootstrap ./tests/bootstrap.php tests

composer-install:
	$(CURL) -s https://getcomposer.org/installer | php

debug:
	$(PHP) -S 192.168.33.101:8080 -t public/
help:
	cat Makefile
