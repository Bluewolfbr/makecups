import sbt.Keys._

val guice = Seq(
  "com.google.inject" % "guice" % "3.0",
  "javax.inject" % "javax.inject" % "1"
)

val slick = "com.typesafe.play" %% "play-slick" % "0.8.1"

val playDependencies = Seq(
  jdbc,
  cache,
  ws,
  slick
)

lazy val dddEasy = project

lazy val root = (project in file(".")).enablePlugins(PlayScala).
  aggregate(dddEasy).
  dependsOn(dddEasy).
  settings(
    name := """makecups-backend""",
    version := "1.0-SNAPSHOT",
    scalaVersion := "2.11.1",
    libraryDependencies ++= playDependencies,
    libraryDependencies ++= guice,
    compile in Test <<= Play.PostCompile(Test)
  )




