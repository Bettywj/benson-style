libevent��һ����demo

1. ��װlibevent
tar �Cxzvf libevent-1.4.13-stable.tar.gz
cd libevent-1.4.13-stable
./configure --prefix=/usr/libevent
make && make install

2. ��������ʱ��Ҫ��-levent����ѡ��,�Լ�ͷ�ļ�Ŀ¼
INC = -I /usr/libevent/include
LIB = -L /usr/libevent/lib -levent

3. ��ִ��ʱ������error while loading shared libraries: libevent-2.0.so.5: cannot open shared object file: No such file or directory����Ϊ�Ҳ�������⡣
ִ��export LD_LIBRARY_PATH=/usr/libevent/lib/:$LD_LIBRARY_PATH����·������ϵͳ�����������ִ�г���Ϳ����ˡ�
/usr/libevent/lib/��configureʱ��prefix��������
