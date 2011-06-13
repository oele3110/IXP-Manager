#!/bin/sh
#
# Copyright (C) 2009-2011 Internet Neutral Exchange Association Limited.
# All Rights Reserved.
# 
# This file is part of IXP Manager.
# 
# IXP Manager is free software: you can redistribute it and/or modify it
# under the terms of the GNU General Public License as published by the Free
# Software Foundation, version 2.0 of the License.
# 
# IXP Manager is distributed in the hope that it will be useful, but WITHOUT
# ANY WARRANTY; without even the implied warranty of MERCHANTABILITY or
# FITNESS FOR A PARTICULAR PURPOSE.  See the GNU General Public License for
# more details.
# 
# You should have received a copy of the GNU General Public License v2.0
# along with IXP Manager.  If not, see:
# 
# http://www.gnu.org/licenses/gpl-2.0.html

PATH=/usr/local/bin:$PATH
export PATH

querytype="$1"
shift

query="$1"
shift

if [ "X"${querytype} = "Xprefixlist" ]; then
	echo "${query}" | \
		peval $* | \
		tail +2  | \
		cut -d \{ -f2 | cut -d \} -f1 | \
		fmt -1 | \
		awk '{print $1}' | \
		fmt -w 999999
elif [ "X"${querytype} = "Xasnlist" ]; then
	echo "${query}" | \
		peval -no-as $* | \
		tail +2  | \
		cut -d \( -f3 | cut -d \) -f1 | \
		sed -e 's/AS//g' | \
		fmt -1 | \
		awk '{print $1}' | \
		fmt -w 999999 | \
		sed -e 's/ /, /g'
fi

exit $?
