install:
	composer install

validate:
	composer validate

test:
	composer exec -v phpunit tests
