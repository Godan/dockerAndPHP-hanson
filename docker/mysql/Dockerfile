FROM mysql:latest

ADD log.cnf /etc/mysql/conf.d/log.cnf
ADD my.cnf /etc/mysql/conf.d/my.cnf

RUN chmod 644 /etc/mysql/conf.d/log.cnf


# utf8サポート
RUN { \
  echo '[mysqld]'; \
  echo 'character-set-server = utf8mb4'; \
  echo '[client]'; \
  echo 'default-character-set = utf8mb4'; \
} > /etc/mysql/conf.d/charset.cnf

RUN apt-get update && apt-get install -y nano locales \
  --no-install-recommends && rm -rf /var/lib/apt/lists/*

RUN dpkg-reconfigure locales && \
    locale-gen C.UTF-8 && \
    /usr/sbin/update-locale LANG=C.UTF-8

# 初期データベースの作成
COPY init.sql /docker-entrypoint-initdb.d/prepare.sql

ENV LC_ALL C.UTF-8
ENV TERM xterm
