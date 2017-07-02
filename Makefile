.PHONY = clean stop build run

CONTAINER = 'iob'

clean: stop
	@docker rm $(CONTAINER)  | true
	@docker rmi $(CONTAINER) | true

stop:
	@docker stop $(CONTAINER) | true

build: clean
	@docker build -t $(CONTAINER) .

run: build
	@docker run --name $(CONTAINER) --detach -p 8080:80 -t $(CONTAINER)
