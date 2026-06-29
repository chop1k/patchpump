# ++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
# PHP & Tools
# ++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
PHP_INTERPRETER          := /usr/bin/php
PHP_TESTING_TOOL         := vendor/bin/testo
PHP_CODE_QUALITY_TOOL    := vendor/bin/php-cs-fixer
PHP_CODE_METRICS_TOOL    := vendor/bin/phpmetrics
PHP_STATIC_ANALYSIS_TOOL := vendor/bin/psalm

# ++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
# Application - Sources
# ++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
APP_SOURCES_DIR         = src
APP_SOURCES_TESTING_DIR = tests
APP_BUILD_DIR           = dist

# ++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
# Application - Testing
# ++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++

# ++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
# Application - Code quality
# ++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
CODE_QUALITY_CONFIG          := .php-cs-fixer.php
CODE_METRICS_BUILD_DIR        = $(APP_BUILD_DIR)/metrics
CODE_METRICS_HTML_REPORT      = $(CODE_METRICS_BUILD_DIR)/html
CODE_METRICS_JSON_REPORT      = $(CODE_METRICS_BUILD_DIR)/report.json
CODE_METRICS_JSON_SUMMARY     = $(CODE_METRICS_BUILD_DIR)/summary.json
CODE_METRICS_JSON_VIOLATIONS  = $(CODE_METRICS_BUILD_DIR)/violations.json

# ++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
# PHONY & such
# ++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
PHONY_TARGETS  = all
PHONY_TARGETS += all-tests all-code all-fonts
PHONY_TARGETS += tests-e2e tests-unit tests-coverage tests-fuzzing
PHONY_TARGETS += code-style code-inspect code-metrics
PHONY_TARGETS += fonts-segoe
PHONY_TARGETS += help

.PHONY: $(PHONY_TARGETS)

all: all-fonts all-code all-tests

all-tests:
	$(PHP_INTERPRETER) $(PHP_TESTING_TOOL)

all_code:

all_fonts:

tests-e2e:
	$(PHP_INTERPRETER) $(PHP_TESTING_TOOL) \
		--testsuite=e2e

tests-unit:
	$(PHP_INTERPRETER) $(PHP_TESTING_TOOL) \
		--testsuite=unit

tests-coverage:

tests-fuzzing:
	$(PHP_INTERPRETER) $(PHP_TESTING_TOOL) \
		--testsuite=fuzzing
code-style:
	$(PHP_INTERPRETER) $(PHP_CODE_QUALITY_TOOL) \
		--config=$(CODE_QUALITY_CONFIG)         \
		fix                                     \
		$(APP_SOURCES_DIR)                      \
		$(APP_SOURCES_TESTING_DIR)

code-inspect:
	$(PHP_INTERPRETER) $(PHP_STATIC_ANALYSIS_TOOL)

code-metrics:
	$(PHP_INTERPRETER) $(PHP_CODE_METRICS_TOOL)             \
		--report-html=$(CODE_METRICS_HTML_REPORT)           \
		--report-json=$(CODE_METRICS_JSON_REPORT)           \
		--report-summary-json=$(CODE_METRICS_JSON_SUMMARY)  \
		--report-violations=$(CODE_METRICS_JSON_VIOLATIONS) \
		$(APP_SOURCES_DIR)

fonts-segoe:

help:
	@echo "help"