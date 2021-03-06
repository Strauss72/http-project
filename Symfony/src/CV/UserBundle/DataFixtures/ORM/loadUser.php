namespace CV\UserBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\FixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use CV\UserBundle\Entity\User;

class LoadUser implements FixtureInterface
{
  public function load(ObjectManager $manager)
  {
    $listNames = array('Admin');

    foreach ($listNames as $name) {
      $user = new User;

      $user->setUsername($name);
      $user->setPassword($name);

      $user->setSalt('');
      $user->setRoles(array('ROLE_SUPER_ADMIN'));

      $manager->persist($user);
    }

    $manager->flush();
  }
}