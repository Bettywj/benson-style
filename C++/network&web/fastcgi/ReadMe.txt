һ��c++������webӦ��demo��Ӧ����fastcgi��nginx

������webapplib���ÿ��װ��cgi�ĳ��ò�������ȡ����������cookies�ȡ�
http://www.open-open.com/lib/view/open1345192887803.html

�ҽ�������֧��fastcgi����⡣

nginx�����ļ���
server {
        listen 8100;

        location / {
            root /export/servers/nginx;
            index index.html;
        }

        location ~ wsp.cgi$ {           
            fastcgi_pass 127.0.0.1:9988;
			#fastcgi_pass unix:/dev/shm/fcgisample.sock;
            fastcgi_index index.cgi;
            #fastcgi_param SCRIPT_FILENAME /root/zhb/cpp/my_practice/fastcgi/bin$fastcgi_script_name;
            include fastcgi_params;
        }
}

���ʵ�ַ��http://192.168.144.120:8100/wsp.cgi?username=133&email=12132��post��body����Ϊpassword=sdfdsf
�������ݣ�
username: 133
email: 12132
password: sdfdsf
usercookie: 133

����̳̣�http://blog.csdn.net/okiwilldoit/article/details/51659170