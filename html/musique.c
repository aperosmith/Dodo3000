#include <unistd.h>
#include <stdio.h>
#include <stdlib.h>
#include <wiringPi.h>

void		myputchar(char c)
{
	write(1,&c,1);
}

void		myprint(char *c)
{
	for (int i = 0;c[i] != '\0'; i++)
		myputchar(c[i]);
}

int musique(void)
 {
    pid_t p;
    char kill[20] = "kill-s 9 ";

    p = fork();
    if(p < 0)
    {
        printf("fork failure");
        exit(-1);
    }
    else if (p == 0)
    {
        execlp("omxplayer", "omxplayer", "montagne.mp3", "", NULL);
    }
    else
    {
        printf("le pro a comme pid %d\n Press enter to quit\n", p);
       // sprintf(kill,"%s%d", kill,p);
      //  system(kill);
        printf("Done");
    }
    return(0);
}

int             main(void)
{
        int     rgb = 21;
        int     bruit = 23;
        int     i = 0;
	int	score = 0;
        wiringPiSetup();
        pinMode(rgb, OUTPUT);
        pinMode(bruit, INPUT);
        while(1)
        {
		i = digitalRead(23);
		delay(100);
		if(i == 0)
		{
			score ++;
			printf("%d\n",score);
		}
		else
		{
			if(score > 0)
				score--;
		}
                if( score == 50 )
                {
                       	digitalWrite(rgb, HIGH);
                       	musique();
	  		delay(92000);
                }
		else
		{
			digitalWrite(rgb,LOW);
		}


        }
        return(0);
}
