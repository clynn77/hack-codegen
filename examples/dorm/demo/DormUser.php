<?hh // strict
/**
 * This file is partially generated. Only make modifications between BEGIN
 * MANUAL SECTION and END MANUAL SECTION designators.
 *
 * To re-generate this file run codegen.php DormUserSchema
 *
 *
 * @partially-generated SignedSource<<60c1cef666778a7213e26b6e305019b0>>
 */
use namespace Facebook\TypeAssert;

final class DormUser {

  const type TData = shape(
    'first_name' => string,
    'last_name' => string,
    'birthday' => ?int,
    'country_id' => ?int,
    'is_active' => bool,
  );

  private function __construct(private self::TData $data) {
  }

  public static function load(int $id): ?DormUser {
    $conn = new PDO('sqlite:/path/to/database.db');
    $cursor = $conn->query("select * from user where user_id=$id");
    $result = $cursor->fetch(PDO::FETCH_ASSOC);
    if (!$result) {
      return null;
    }
    $ts = type_structure(self::class, 'TData');
    $data = TypeAssert\matches_type_structure($ts, $result);
    return new DormUser($data);
  }

  public function getFirstName(): string {
    $value = $this->data['first_name'];
    return $value;
  }

  public function getLastName(): string {
    $value = $this->data['last_name'];
    return $value;
  }

  public function getBirthday(): ?DateTime {
    $value = $this->data['birthday'] ?? null;
    return $value === null ? null : new DateTime($value);
  }

  public function getCountryId(): ?int {
    /* BEGIN MANUAL SECTION CountryId */
    // You may manually change this section of code
    $value = $this->data['country_id'] ?? null;
    return $value;
    /* END MANUAL SECTION */
  }

  public function getIsActive(): bool {
    $value = $this->data['is_active'];
    return $value;
  }
}
