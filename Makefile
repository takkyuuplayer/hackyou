PHP=$(shell which php)
CURL=$(shell which curl)
ifneq ("$(wildcard composer.phar)", "")
COMPOSER=./composer.phar
else
COMPOSER=composer
endif

all: composer-update composer-setup db-setup

composer-update:
	$(COMPOSER) self-update

composer-setup:
	$(COMPOSER) install

test:
	./vendor/bin/phpunit --bootstrap vendor/autoload.php tests

composer-install:
	$(CURL) -s https://getcomposer.org/installer | php

help:
	cat Makefile
