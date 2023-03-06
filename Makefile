
.PHONY: cs-fix
cs-fix:
	PHP_CS_FIXER_IGNORE_ENV=1 php ./php-cs-fixer.phar fix --verbose
