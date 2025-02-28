# Переменные
ENV_FILE=.env.dev
SERVICE=

# Команды
.PHONY: dev prod stop clean logs

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

# Просмотр логов конкретного сервиса
logs:
ifeq ($(SERVICE),)
	@echo "Укажите сервис через SERVICE=<имя_сервиса>"
else
	docker compose logs -f $(SERVICE)
endif

# Пересборка и запуск сервиса
rebuild:
ifeq ($(SERVICE),)
	@echo "Укажите сервис через SERVICE=<имя_сервиса>"
else
	docker compose up -d --build $(SERVICE)
endif

# Проверка состояния контейнеров
status:
	docker compose ps

# Подключение к контейнеру
ssh:
ifeq ($(SERVICE),)
	@echo "Укажите сервис через SERVICE=<имя_сервиса>"
else
	docker compose exec $(SERVICE) sh
endif