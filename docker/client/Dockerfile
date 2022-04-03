FROM node:16.10.0-buster
RUN apt update -y \
    && apt install -y git

ENV LANG=C.UTF-8
ENV LANGUAGE=en_US:
RUN adduser --quiet --disabled-password \
    --shell /bin/bash --home /projects \
    --gecos "User" devuser && \
    echo "devuser:<a href="mailto://p@ssword1">p@ssword1</a>" | chpasswd &&  usermod -aG sudo devuser
USER devuser
WORKDIR /projects
