#include <unistd.h>
#include <stdio.h>
#include <stdlib.h>

int main (void)
{
	system("php -f testgg.php");
	perror("execlp");
}
