

validate:
	composer validate --no-check-publish

phpstan:
	./vendor/bin/phpstan analyse -c phpstan.neon

phpcs:
	./vendor/bin/phpcs -v --standard=PSR12 --ignore=./src/Kernel.php ./src

twig-lint:
	php bin/console lint:twig ./templates
