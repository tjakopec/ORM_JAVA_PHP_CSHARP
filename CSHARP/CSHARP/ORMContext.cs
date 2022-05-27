using System;
using CSHARP.Model;
using Microsoft.EntityFrameworkCore;
using Microsoft.Extensions.Logging;

namespace CSHARP
{
	public class ORMContext : DbContext
	{
		public DbSet<Igrac>? Igraci { get; set; }
		public DbSet<Lokacija>? Lokacije { get; set; }
		public DbSet<Mjesanje>? Mjesanja { get; set; }
		public DbSet<Partija>? Partije { get; set; }

		protected override void OnConfiguring(DbContextOptionsBuilder optionsBuilder)
		{
			optionsBuilder
				.UseMySql("server=localhost;database=orm_csharp;user=orm;password=orm",
				new MariaDbServerVersion(new Version(10, 4, 11)))
				// The following three options help with debugging, but should
				// be changed or removed for production.
				.LogTo(Console.WriteLine, LogLevel.Information)
				.EnableSensitiveDataLogging()
				.EnableDetailedErrors();

		}
	}
}

