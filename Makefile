SRC_DIR := ./src
PUB_DIR := ./public

serve:
	php -S localhost:8000 -t ${PUB_DIR}

