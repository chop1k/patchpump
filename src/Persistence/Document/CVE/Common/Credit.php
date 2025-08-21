<?php

declare(strict_types=1);

namespace App\Persistence\Document\CVE\Common;

use Doctrine\ODM\MongoDB\Mapping\Annotations as ODM;

/**
 * @final
 *
 * @readonly
 */
#[ODM\EmbeddedDocument]
class Credit
{
    private const Other = 0;

    private const Finder = 1;

    private const Reporter = 2;

    private const Analyst = 3;

    private const Coordinator = 4;

    private const RemediationDeveloper = 5;

    private const RemediationReviewer = 6;

    private const RemediationVerifier = 7;

    private const Tool = 8;

    private const Sponsor = 9;

    private function __construct(
        #[ODM\Field]
        private string $language,

        #[ODM\Field]
        private string $content,

        #[ODM\Field]
        private ?string $user,

        #[ODM\Field]
        private ?int $type,
    ) {
    }

    public static function withOther(string $language, string $content, ?string $user): self
    {
        return new self($language, $content, $user, self::Other);
    }

    public static function withFinder(string $language, string $content, ?string $user): self
    {
        return new self($language, $content, $user, self::Finder);
    }

    public static function withReporter(string $language, string $content, ?string $user): self
    {
        return new self($language, $content, $user, self::Reporter);
    }

    public static function withAnalyst(string $language, string $content, ?string $user): self
    {
        return new self($language, $content, $user, self::Analyst);
    }

    public static function withCoordinator(string $language, string $content, ?string $user): self
    {
        return new self($language, $content, $user, self::Coordinator);
    }

    public static function withRemediationDeveloper(string $language, string $content, ?string $user): self
    {
        return new self($language, $content, $user, self::RemediationDeveloper);
    }

    public static function withRemediationReviewer(string $language, string $content, ?string $user): self
    {
        return new self($language, $content, $user, self::RemediationReviewer);
    }

    public static function withRemediationVerifier(string $language, string $content, ?string $user): self
    {
        return new self($language, $content, $user, self::RemediationVerifier);
    }

    public static function withTool(string $language, string $content, ?string $user): self
    {
        return new self($language, $content, $user, self::Tool);
    }

    public static function withSponsor(string $language, string $content, ?string $user): self
    {
        return new self($language, $content, $user, self::Sponsor);
    }

    public static function withNull(string $language, string $content, ?string $user): self
    {
        return new self($language, $content, $user, null);
    }

    public function language(): string
    {
        return $this->language;
    }

    public function content(): string
    {
        return $this->content;
    }

    public function user(): ?string
    {
        return $this->user;
    }

    public function other(): bool
    {
        return self::Other === $this->type;
    }

    public function finder(): bool
    {
        return self::Finder === $this->type;
    }

    public function reporter(): bool
    {
        return self::Reporter === $this->type;
    }

    public function analyst(): bool
    {
        return self::Analyst === $this->type;
    }

    public function coordinator(): bool
    {
        return self::Coordinator === $this->type;
    }

    public function remediationDeveloper(): bool
    {
        return self::RemediationDeveloper === $this->type;
    }

    public function remediationReviewer(): bool
    {
        return self::RemediationReviewer === $this->type;
    }

    public function remediationVerifier(): bool
    {
        return self::RemediationVerifier === $this->type;
    }

    public function tool(): bool
    {
        return self::Tool === $this->type;
    }

    public function sponsor(): bool
    {
        return self::Sponsor === $this->type;
    }
}
