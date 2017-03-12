#!/bin/bash
apt-get -y --force-yes update
apt-get -y --force-yes install make gcc vim
cd /var
wget http://www.inet.no/dante/files/dante-1.3.2.tar.gz
tar xvfz dante-*
cd dante-*
./configure
make
make install
echo -e "internal: TYPE_DE_CONNEXION port = 1080 \n external: ADRESSE_IP_DE_LA_MACHINE \n method: username #rfc931 \n clientmethod: none \n user.privileged: root \n user.notprivileged: nobody \n client pass { \n         from: 0.0.0.0/0 port 1-65535 to: 0.0.0.0/0 \n         log: connect disconnect error \n } \n pass { \n         from: 0.0.0.0/0 to: 0.0.0.0/0 \n         protocol: tcp udp \n }" > /etc/sockd.conf
sockd -V
sockd -D