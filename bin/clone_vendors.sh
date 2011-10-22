#!/bin/bash

DIR="$(dirname "$(readlink -f "$0")")/.."
VENDORS_DIR="$DIR/libs-all"
LIBS_DIR="$DIR/libs"

mkdir $VENDORS_DIR
cd $VENDORS_DIR

##
# @param destination directory (e.g. "doctrine")
# @param URL of the git remote (e.g. git://github.com/doctrine/doctrine2.git)
# @param revision to point the head (e.g. origin/HEAD)
#
install_git()
{
	INSTALL_DIR=$1
	SOURCE_URL=$2
	REV=$3

	echo
	echo "Installing $INSTALL_DIR ..."

	if [ -z $REV ]; then
		REV=origin/master
	fi

	if [ ! -d $INSTALL_DIR ]; then
		git clone $SOURCE_URL $INSTALL_DIR
	fi

	cd $INSTALL_DIR
	git fetch origin
	git reset --hard $REV
	cd ..
}

# Nette Framework
install_git nette git://github.com/nette/nette.git 419443f3d5a6fde0607580f7b3dcc9987a51f1a0
ln -s "$VENDORS_DIR/nette/Nette" "$LIBS_DIR/Nette" 


# Venne:CMS
install_git venne git://github.com/Venne/Venne-CMS.git
ln -s "$VENDORS_DIR/venne/Venne" "$LIBS_DIR/Venne"
ln -s "$VENDORS_DIR/venne/App" "$LIBS_DIR/App"

# Doctrine
install_git doctrine git://github.com/doctrine/doctrine2.git 2.1.2
cd "$VENDORS_DIR/doctrine"
git submodule init
git submodule update
ln -s "$VENDORS_DIR/doctrine/lib" "$LIBS_DIR/Doctrine"


