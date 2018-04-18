#include <unistd.h>
#include <stdio.h>
#include <stdlib.h>

int main(void)
{
	pid_t	p;
	char kill[20] = "kill-s 9 ";
	
	p = fork();

	if(p < 0)
	{
		printf("fork failure");
		exit(-1);
	}
	else if (p == 0)
	{
		execlp("omxplayer", "omxplayer", "", "", NULL);
	}
	else 
	{
		printf("le pro a comme pid %d\n Press enter to quit\n", p);
		sprintf(kill,"%s%d", kill,p);
		system(kill);
		printf("Done");
	}
	exit(0);
}
