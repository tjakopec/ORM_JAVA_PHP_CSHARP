// See https://aka.ms/new-console-template for more information
using CSHARP;



var db = new ORMContext();
if (db.Igraci != null)
{
    Console.WriteLine(value: db.Igraci.Count());
}
else
{
    Console.WriteLine("Hello, World!");
}