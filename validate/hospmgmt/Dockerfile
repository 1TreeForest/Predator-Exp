FROM witcherfuzz/phpwebfuzz

ENV TZ=America/Los_Angeles
RUN ln -snf /usr/share/zoneinfo/$TZ /etc/localtime && echo $TZ > /etc/timezone

# RUN apt-get update
# RUN apt-get install --yes python3 python3-pip software-properties-common apache2 mysql-server mysql-client

COPY hms/hospital /var/www/html/hms
RUN chown -R www-data:www-data /var/www/html/hms
COPY hms/hms.sql /tmp/db.preseed
COPY init.sh /tmp/init.sh
COPY exploit.py /exploit.py

WORKDIR /home/wc
COPY lib_mysqludf_sys/install.sh lib_mysqludf_sys/lib_mysqludf_sys.sql ./
COPY lib_mysqludf_sys/lib_mysqludf_sys.so /usr/lib/mysql/plugin/
RUN chmod 500 install.sh
RUN bash install.sh

RUN su - wc -c "source /home/wc/.virtualenvs/witcherfuzz/bin/activate && pip install ply "

ARG USE_INSTRUMENTED
COPY hms_instrumented /root/app_instrumented

EXPOSE 80
RUN rm -f /var/run/mysqld/mysqld.sock.lock
RUN bash /tmp/init.sh
CMD ["supervisord"]
