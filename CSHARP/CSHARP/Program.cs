// See https://aka.ms/new-console-template for more information
using CSHARP;



var db = new ORMContext();
if (db.Rezultati != null)
{
    Console.WriteLine(value: db.Rezultati.Count());
}
else
{
    Console.WriteLine("Hello, World!");
}