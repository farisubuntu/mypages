#!/bin/bash

# check for non-existent file, exit status will be 2

ls notfound.txt
echo "status: $?"

# create a file and do again:

touch notfound.txt
ls notfound.txt
echo "Status: $?"

# remove the file clean up
rm notfound.txt