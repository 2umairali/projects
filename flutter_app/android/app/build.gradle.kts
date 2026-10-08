import java.io.FileInputStream
import java.util.Properties

plugins {
    id("com.android.application")
    // The Flutter Gradle Plugin must be applied after the Android and Kotlin Gradle plugins.
    id("dev.flutter.flutter-gradle-plugin")
    id("com.google.gms.google-services")
}

// Release signing: create android/key.properties (see BRANDING.md → "Sign the release").
// Without that file the build still works, signed with the debug key (fine for testing, NOT for the Play Store).
val keystoreFile = rootProject.file("key.properties")
val keystoreProperties = Properties()
if (keystoreFile.exists()) keystoreProperties.load(FileInputStream(keystoreFile))

android {
    namespace = "com.dahify.dahimail"
    compileSdk = flutter.compileSdkVersion
    ndkVersion = flutter.ndkVersion

    compileOptions {
        sourceCompatibility = JavaVersion.VERSION_17
        targetCompatibility = JavaVersion.VERSION_17
        // Required by flutter_local_notifications (uses java.time on older Android versions)
        isCoreLibraryDesugaringEnabled = true
    }

    defaultConfig {
        applicationId = "com.dahify.dahimail"
        minSdk = maxOf(23, flutter.minSdkVersion)  // the voice-message recorder needs Android 6.0+
        targetSdk = flutter.targetSdkVersion
        versionCode = flutter.versionCode
        versionName = flutter.versionName
    }

    signingConfigs {
        if (keystoreFile.exists()) {
            create("release") {
                keyAlias = keystoreProperties["keyAlias"] as String
                keyPassword = keystoreProperties["keyPassword"] as String
                storeFile = file(keystoreProperties["storeFile"] as String)
                storePassword = keystoreProperties["storePassword"] as String
            }
        }
    }

    buildTypes {
        release {
            signingConfig = if (keystoreFile.exists()) signingConfigs.getByName("release") else signingConfigs.getByName("debug")
        }
    }
}

kotlin {
    compilerOptions {
        jvmTarget = org.jetbrains.kotlin.gradle.dsl.JvmTarget.JVM_17
    }
}

dependencies {
    coreLibraryDesugaring("com.android.tools:desugar_jdk_libs:2.1.5")
    // AppCompat themes are needed by the fingerprint / face prompt
    implementation("androidx.appcompat:appcompat:1.7.0")
    // One splash screen for all Android versions (Theme.SplashScreen)
    implementation("androidx.core:core-splashscreen:1.0.1")
}

flutter {
    source = "../.."
}
