﻿// <auto-generated />
using CSHARP;
using Microsoft.EntityFrameworkCore;
using Microsoft.EntityFrameworkCore.Infrastructure;
using Microsoft.EntityFrameworkCore.Migrations;
using Microsoft.EntityFrameworkCore.Storage.ValueConversion;

#nullable disable

namespace CSHARP.Migrations
{
    [DbContext(typeof(ORMContext))]
    [Migration("20220527115615_initial")]
    partial class initial
    {
        protected override void BuildTargetModel(ModelBuilder modelBuilder)
        {
#pragma warning disable 612, 618
            modelBuilder
                .HasAnnotation("ProductVersion", "6.0.5")
                .HasAnnotation("Relational:MaxIdentifierLength", 64);

            modelBuilder.Entity("CSHARP.Model.Rezultat", b =>
                {
                    b.Property<int>("prvi")
                        .ValueGeneratedOnAdd()
                        .HasColumnType("int");

                    b.Property<int>("drugi")
                        .HasColumnType("int");

                    b.Property<int>("treci")
                        .HasColumnType("int");

                    b.HasKey("prvi");

                    b.ToTable("rezultat");
                });
#pragma warning restore 612, 618
        }
    }
}
