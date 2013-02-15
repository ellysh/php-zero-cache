CLIENT_DIR = ../client
COMMON_DIR = ../common
CPP_FILES = $(CLIENT_DIR)/registrar_client.cpp \
			$(CLIENT_DIR)/client_list.cpp \
			$(CLIENT_DIR)/client_wrap.cpp \
			$(CLIENT_DIR)/client_base.cpp \
			$(CLIENT_DIR)/client.cpp \
			$(COMMON_DIR)/package.cpp \
			$(COMMON_DIR)/debug.cpp \
			$(COMMON_DIR)/request.cpp \
			$(COMMON_DIR)/answer.cpp \
			$(COMMON_DIR)/connection.cpp \
			$(COMMON_DIR)/functions.cpp \
			$(COMMON_DIR)/speaker.cpp \
			$(COMMON_DIR)/socket.cpp
INSTALL_LIB_DIR = usr/lib/php5/20090626
INSTALL_MODULE_DIR = usr/share/php

OBJ_FILES = registrar_client.o client_base.o debug.o functions.o client_list.o client.o connection.o socket.o speaker.o answer.o request.o client_wrap.o package.o
CXXFLAGS = -I"/usr/include/php5/Zend" -I"/usr/include/php5/TSRM" -I"/usr/include/php5/main" -I"/usr/include/php5" -I"../common" -I"../server"
MODULE_NAME = client_wrap

all: clean $(MODULE_NAME)

$(MODULE_NAME):
	swig -php -c++ -make_default $(MODULE_NAME).i
	gcc -c -fpic $(MODULE_NAME)_wrap.cpp $(CPP_FILES) -DHAVE_CONFIG_H $(CXXFLAGS)
	g++ -shared $(OBJ_FILES) $(MODULE_NAME)_wrap.o -lzmq -o $(MODULE_NAME).so

install:
	mkdir -p $(DESTDIR)/$(INSTALL_LIB_DIR)
	cp $(MODULE_NAME).so $(DESTDIR)/$(INSTALL_LIB_DIR)
	mkdir -p $(DESTDIR)/$(INSTALL_MODULE_DIR)
	cp $(MODULE_NAME).php $(DESTDIR)/$(INSTALL_MODULE_DIR)

clean:
	rm -f *.cpp *.so *.o *.php *.h
