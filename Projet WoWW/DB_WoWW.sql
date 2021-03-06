DROP DATABASE WoWW
GO
USE [master]
GO
/****** Object:  Database [WoWW]    Script Date: 06-12-21 13:58:16 ******/
CREATE DATABASE [WoWW]
go
USE [WoWW]
GO
/****** Object:  Table [dbo].[Character]    Script Date: 06-12-21 13:58:16 ******/
CREATE TABLE [dbo].[Character](
	[Id] [int] IDENTITY(1,1) NOT NULL PRIMARY KEY,
	[name] [nvarchar](50) NOT NULL,
	[LP] [int] NOT NULL,
	[AP] [int] NOT NULL,
	[status] [bit] NOT NULL,
	[FK_Type] [int] NULL,
	[FK_Player] [int] NULL)

CREATE TABLE [dbo].[Fight](
	[Id] [int] IDENTITY(1,1) NOT NULL PRIMARY KEY,
	[dateFight] [datetime2](7) NULL,
	[FK_Tournament] [int] NULL,
	[FK_Winner] [int] NULL,
	[FK_Looser] [int] NULL)

CREATE TABLE [dbo].[Participation](
	[Id] [int] IDENTITY(1,1) NOT NULL PRIMARY KEY,
	[registrationDate] [datetime2](7) NOT NULL,
	[FK_Team] [int] NULL,
	[FK_Tournament] [int] NULL)


CREATE TABLE [dbo].[Player](
	[Id] [int] NOT NULL PRIMARY KEY,
	[name] [nvarchar](50) NOT NULL,
	[email] [nvarchar](50) NOT NULL,
	[password] [nvarchar](50) NOT NULL,
	[FK_Team] [int] NULL)


CREATE TABLE [dbo].[Team](
	[Id] [int] IDENTITY(1,1) NOT NULL PRIMARY KEY,
	[name] [nvarchar](50) NOT NULL,
	[score] [int] NOT NULL)



CREATE TABLE [dbo].[Tournament](
	[Id] [int] IDENTITY(1,1) NOT NULL PRIMARY KEY,
	[name] [nvarchar](50) NOT NULL,
	[category] [nvarchar](50) NOT NULL)



CREATE TABLE [dbo].[Type](
	[Id] [int] IDENTITY(1,1) NOT NULL PRIMARY KEY,
	[nameType] [nvarchar](50) NOT NULL,
	[minLP] [int] NOT NULL,
	[maxLP] [int] NOT NULL,
	[minAP] [int] NOT NULL,
	[maxAP] [int] NOT NULL)

GO
ALTER TABLE [dbo].[Character] ADD  CONSTRAINT [DF_Character_status]  DEFAULT ((1)) FOR [status]
GO
ALTER TABLE [dbo].[Team] ADD  CONSTRAINT [DF_Team_score]  DEFAULT ((0)) FOR [score]
GO
ALTER TABLE [dbo].[Character]  WITH CHECK ADD  CONSTRAINT [FK_Character_Player] FOREIGN KEY([FK_Player])
REFERENCES [dbo].[Player] ([Id])
ON UPDATE SET NULL
ON DELETE SET NULL
GO
ALTER TABLE [dbo].[Character] CHECK CONSTRAINT [FK_Character_Player]
GO
ALTER TABLE [dbo].[Character]  WITH CHECK ADD  CONSTRAINT [FK_Character_Type] FOREIGN KEY([FK_Type])
REFERENCES [dbo].[Type] ([Id])
ON UPDATE SET NULL
ON DELETE SET NULL
GO
ALTER TABLE [dbo].[Character] CHECK CONSTRAINT [FK_Character_Type]
GO
ALTER TABLE [dbo].[Fight]  WITH CHECK ADD  CONSTRAINT [FK_Fight_Tournament] FOREIGN KEY([FK_Tournament])
REFERENCES [dbo].[Tournament] ([Id])
ON UPDATE SET NULL
ON DELETE SET NULL
GO
ALTER TABLE [dbo].[Fight] CHECK CONSTRAINT [FK_Fight_Tournament]
GO
ALTER TABLE [dbo].[Fight]  WITH CHECK ADD  CONSTRAINT [FK_Looser] FOREIGN KEY([FK_Looser])
REFERENCES [dbo].[Character] ([Id])
GO
ALTER TABLE [dbo].[Fight] CHECK CONSTRAINT [FK_Looser]
GO
ALTER TABLE [dbo].[Fight]  WITH CHECK ADD  CONSTRAINT [FK_Winner] FOREIGN KEY([FK_Winner])
REFERENCES [dbo].[Character] ([Id])
GO
ALTER TABLE [dbo].[Fight] CHECK CONSTRAINT [FK_Winner]
GO
ALTER TABLE [dbo].[Participation]  WITH CHECK ADD  CONSTRAINT [FK_Participation_Team] FOREIGN KEY([FK_Team])
REFERENCES [dbo].[Team] ([Id])
ON UPDATE SET NULL
ON DELETE SET NULL
GO
ALTER TABLE [dbo].[Participation] CHECK CONSTRAINT [FK_Participation_Team]
GO
ALTER TABLE [dbo].[Participation]  WITH CHECK ADD  CONSTRAINT [FK_Participation_Tournament] FOREIGN KEY([FK_Tournament])
REFERENCES [dbo].[Tournament] ([Id])
ON UPDATE SET NULL
ON DELETE SET NULL
GO
ALTER TABLE [dbo].[Participation] CHECK CONSTRAINT [FK_Participation_Tournament]
GO
ALTER TABLE [dbo].[Player]  WITH CHECK ADD  CONSTRAINT [FK_Player_Team] FOREIGN KEY([FK_Team])
REFERENCES [dbo].[Team] ([Id])
ON UPDATE SET NULL
ON DELETE SET NULL
GO
ALTER TABLE [dbo].[Player] CHECK CONSTRAINT [FK_Player_Team]
GO
ALTER TABLE [dbo].[Tournament]  WITH CHECK ADD  CONSTRAINT [CK_Tournament] CHECK  (([category]='Advanced' OR [category]='Intermediate' OR [category]='Beginner'))
GO
ALTER TABLE [dbo].[Tournament] CHECK CONSTRAINT [CK_Tournament]
GO
USE [master]
GO
ALTER DATABASE [WoWW] SET  READ_WRITE 
GO
