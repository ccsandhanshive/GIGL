from django.contrib.auth.models import AbstractUser

class CustomUser(AbstractUser):
    pass

    class Meta:
        verbose_name = 'User'
        verbose_name_plural = 'Users'
        db_table = 'users'

# Add related_name arguments to resolve clashes
CustomUser._meta.get_field('groups').related_name = 'custom_user_groups'
CustomUser._meta.get_field('user_permissions').related_name = 'custom_user_permissions'