using System;


namespace codeeval
{
    class Program
    {
        static void Main(string[] args)
        {
            int sum = 0;
            int i = 2;
            int count = 0;
            while(count<1000)
            {
                if (isPrime(i))
                {
                    sum = sum + i;
                    count++;
                }
                i++;
            }
            Console.WriteLine(sum);

            Console.ReadLine();
        }
        
        static bool isPrime(int num)
        {
            bool bPrime = true;
            int i = 0;

            for (i = 2; i <= num/2; i++)
            {
                if ((num % i) == 0)
                    bPrime = false;
            }
            return bPrime;
        }
    }
}
