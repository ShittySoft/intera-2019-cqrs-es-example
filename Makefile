.PHONY: *

OPTS=

help:
	@grep -E '^[a-zA-Z_-]+:.*?## .*$$' $(MAKEFILE_LIST) | sort | awk 'BEGIN {FS = ":.*?## "}; {printf "\033[36m%-30s\033[0m %s\n", $$1, $$2}'

voucher: ## run unit tests
	cd voucher && composer install && vendor/bin/psalm

event: ## run unit tests
	cd event && composer install && vendor/bin/psalm