FROM mysql:5.7

ADD ./conf.d/my.cnf /etc/mysql/conf.d/my.cnf
RUN chmod 644 /etc/mysql/conf.d/my.cnf

RUN chmod -R 644 /var/log/mysql/
RUN chown -R mysql:mysql /var/log/mysql/

CMD ["mysqld", "--character-set-server=utf8mb4", "--collation-server=utf8mb4_unicode_ci"]
