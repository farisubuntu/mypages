#!/bin/bash

# The user will be prompted to enter a value, which is then displayed on the screen.
#  The value is stored in a temporary variable, name. We can reference the value of a 
#  shell variable by using a $ in front of the variable name, such as $name.

# tell the user to input his name:
echo "enter your name:"
read name
# Display variable input
echo your name : $name
