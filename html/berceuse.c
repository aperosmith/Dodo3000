#include <unistd.h>
#include <stdio.h>
#include <stdlib.h>
#include <wiringPi.h>

int musique(void)
{
        pid_t   p;
       //char kill[20] = "kill-s 9 ";

        p = fork();

        if(p < 0)
        {
                printf("fork failure");
                exit(-1);
        }
        else if (p == 0)
        {
                execlp("omxplayer", "omxplayer", "berceuse.mp3", "", NULL);
        }
        else
        {
                printf("le pro a comme pid %d\n Press enter to quit\n", p);
                //sprintf(kill,"%s%d", kill,p);
                //system(kill);
                printf("Done");
        }
	return 0;
}
void couleur(void)
{
	wiringPiSetup();
	pinMode(21, OUTPUT);
	pinMode(22, OUTPUT);
	pinMode(23, OUTPUT);
	pinMode(25, INPUT);
	int compteur = 0;
	while(compteur < 24)
	{
		digitalWrite(21, HIGH);
		delay(1000);
		digitalWrite(21, LOW);
		delay(84);
		digitalWrite(22, HIGH);
		delay(1000);
		digitalWrite(22, LOW);
		delay(84);
		digitalWrite(23, HIGH);
		delay(1000);
		digitalWrite(23, LOW);
		delay(84);
		compteur++;
	}
	compteur = 0;
}

int main(void)
{
	wiringPiSetup();
	int i=0;
	int score=0;
	int malus = 0;
	int bruitMax = 0;
	while(1)
	{
		i=digitalRead(25);
		if(i == 0)
		{
			++score;
			if (score == 2200)
			{
				system("php -f eventStart.php");
				system("php -f sns.php");
				musique();
				couleur();
				//delay(80000);
				system("php -f eventEnd.php");
				score = 0;
        			bruitMax = 0;
				malus = 0;
				printf("%d\n", score);
			}

		}
		else
		{
			if(score > 0)
			{
				--score;
				malus++;
				if(malus >= 30)
				{
					score = 0;
					malus = 0;
				}
			}
		}
		if (score > bruitMax)
		{
			bruitMax = score;
			printf("Bruit : %d\n", bruitMax);
		}
	}
	return 0;
}
