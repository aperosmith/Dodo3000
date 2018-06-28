#include <unistd.h>
#include <stdio.h>
#include <stdlib.h>

int main (void)
{
	system("php -f eventStart.php");
	perror("execlp");
        system("php -f eventEnd.php");
        perror("execlp");
}
