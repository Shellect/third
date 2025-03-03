# Переменные
ENV_FILE=.env.dev

# Команды
.PHONY: dev prod stop clean

# Запуск в режиме разработки
dev:
	@echo "Запуск в режиме разработки..."
	docker compose --env-file .env.dev up

# Запуск в режиме продакшена
prod:
	@echo "Запуск в режиме продакшена..."
	docker compose --env-file .env.prod up -d

# Остановка контейнеров
stop:
	@echo "Остановка контейнеров..."
	docker compose down

# Очистка (остановка и удаление контейнеров, volumes, сетей)
clean:
	@echo "Очистка проекта..."
	docker compose down -v --remove-orphans