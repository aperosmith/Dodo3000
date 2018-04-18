#include <stdio.h>
#include <wiringPi.h>

int main(void)
{
	wiringPiSetup();
	int i=0;
	pinMode(21, OUTPUT);
	while(1)
	{
		i=digitalRead(23);
		if(i==HIGH)
		{
			digitalWrite(21, HIGH);
			delay(1000);
		}
		else
		{
			digitalWrite(21, LOW);
		}
	}
	return 0;
}
