fix:
	bin/php-cs-fixer --diff -v fix

test:
	echo "⚠ You need x-debug to run this test suite."
	bin/phpspec run -fpretty
